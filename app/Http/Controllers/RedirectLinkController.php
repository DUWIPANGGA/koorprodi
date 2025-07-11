<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\RedirectLink;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RedirectLinkController extends Controller
{
    public function index()
    {
        $links = RedirectLink::where('user_id', Auth::user()->id)
            ->latest()
            ->paginate(10);

        return view('redirect-links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('redirect-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_url' => 'required|url',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'short_url' => 'nullable|alpha_dash|max:50|unique:redirect_links,short_url',
            'expires_at' => 'nullable|date|after:now',
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['short_url'] = $validated['short_url'] ?? $this->generateUniqueShortUrl();

        RedirectLink::create($validated);

        return redirect()->route('redirect-links.index')
            ->with('success', 'Link created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RedirectLink $redirectLink)
    {
        if (Gate::denies('view', $redirectLink)) {
        abort(403);
    }

        
        return view('redirect-links.show', compact('redirectLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RedirectLink $redirectLink)
    {
if (Gate::denies('update', $redirectLink)) {
        abort(403);
    }
        
        return view('redirect-links.edit', compact('redirectLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RedirectLink $redirectLink)
    {
if (Gate::denies('update', $redirectLink)) {
        abort(403);
    }

        $validated = $request->validate([
            'destination_url' => 'required|url',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'short_url' => [
                'nullable',
                'alpha_dash',
                'max:50',
                Rule::unique('redirect_links')->ignore($redirectLink->id),
            ],
            'expires_at' => 'nullable|date|after:now',
            'is_active' => 'boolean',
        ]);

        $redirectLink->update($validated);

        return redirect()->route('redirect-links.index')
            ->with('success', 'Link updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RedirectLink $redirectLink)
    {
if (Gate::denies('delete', $redirectLink)) {
        abort(403);
    }
        
        $redirectLink->delete();

        return redirect()->route('redirect-links.index')
            ->with('success', 'Link deleted successfully!');
    }

    /**
     * Handle the redirect from short URL to destination URL.
     */
    public function redirect($shortUrl)
{
    $link = RedirectLink::where('short_url', $shortUrl)->first();

    if (!$link || !$link->isValid()) {
        abort(404);
    }

    $link->increment('clicks');

    return redirect()->away($link->destination_url);
}

    /**
     * Generate a unique short URL.
     */
    protected function generateUniqueShortUrl()
    {
        $shortUrl = Str::random(6);
        
        while (RedirectLink::where('short_url', $shortUrl)->exists()) {
            $shortUrl = Str::random(6);
        }

        return $shortUrl;
    }
}