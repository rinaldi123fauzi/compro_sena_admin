<?php

namespace App\Http\Controllers;

use App\Models\SoftwareHardware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoftwareHardwareController extends Controller
{
    public function index()
    {
        $softwareHardwares = SoftwareHardware::latest()->get();
        return view('software_hardware.index', compact('softwareHardwares'));
    }

    public function add()
    {
        return view('software_hardware.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:software,hardware',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'type']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/software_hardware'), $imageName);
            $data['image'] = $imageName;
            $data['image_url'] = asset('storage/software_hardware/' . $imageName);
        }

        SoftwareHardware::create($data);

        return redirect()->route('software_hardware.index')
            ->with('success', 'Software/Hardware created successfully.');
    }

    public function edit(SoftwareHardware $softwareHardware)
    {
        return view('software_hardware.edit', compact('softwareHardware'));
    }

    public function update(Request $request, SoftwareHardware $softwareHardware)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:software,hardware',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'type']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($softwareHardware->image && file_exists(public_path('storage/software_hardware/' . $softwareHardware->image))) {
                unlink(public_path('storage/software_hardware/' . $softwareHardware->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/software_hardware'), $imageName);
            $data['image'] = $imageName;
            $data['image_url'] = asset('storage/software_hardware/' . $imageName);
        }

        $softwareHardware->update($data);

        return redirect()->route('software_hardware.index')
            ->with('success', 'Software/Hardware updated successfully.');
    }

    public function destroy(SoftwareHardware $softwareHardware)
    {
        // Delete image if exists
        if ($softwareHardware->image && file_exists(public_path('storage/software_hardware/' . $softwareHardware->image))) {
            unlink(public_path('storage/software_hardware/' . $softwareHardware->image));
        }

        $softwareHardware->delete();

        return redirect()->route('software_hardware.index')
            ->with('success', 'Software/Hardware deleted successfully.');
    }
}
