<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParameterRequest;
use App\Http\Resources\ParameterResource;
use App\Models\Parameter;
use Illuminate\Http\Request;


class ParameterController extends Controller
{
    public function index(Request $request)
    {
        $query = Parameter::where('type', 2);

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $parameters = $query->get();

        return view('parameters.index', compact('parameters'));
    }

    public function show(Parameter $parameter)
    {
        return view('parameters.show', compact('parameter'));
    }

    public function edit(Parameter $parameter)
    {
        return view('parameters.edit', compact('parameter'));
    }

    public function update(ParameterRequest $request, Parameter $parameter)
    {
        if ($request->hasFile('icon')) {
            $parameter->icon = Parameter::uploadImage($request->file('icon'));
        }

        if ($request->hasFile('icon_gray')) {
            $parameter->icon_gray = Parameter::uploadImage($request->file('icon_gray'));
        }

        $parameter->save();

        return redirect()->route('parameters.index')->with('success', 'Parameter updated successfully');
    }

    public function destroyIcon(Parameter $parameter, $iconType)
    {
        if ($iconType == 'icon' && $parameter->icon) {
            \Storage::disk('public')->delete($parameter->icon);
            $parameter->icon = null;
        } elseif ($iconType == 'icon_gray' && $parameter->icon_gray) {
            \Storage::disk('public')->delete($parameter->icon_gray);
            $parameter->icon_gray = null;
        }

        $parameter->save();

        return back()->with('success', ucfirst($iconType) . ' deleted successfully');
    }

    public function apiParameters()
    {
        return ParameterResource::collection(Parameter::where('type', 2)->get());
    }
}