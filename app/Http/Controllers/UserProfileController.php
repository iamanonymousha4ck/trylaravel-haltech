<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{
    public function listUserProfile() {
        $items = UserProfile::orderBy('id', 'desc')->get();

        return $items;
    }

    public function addUserProfile(UserProfileRequest $request) {
        // return $request->all();
        if($request->hasFile('image')) {
            $destination_path = '/images/userprofile';
            $imageFile = $request->file('image');

            // Get file ext
            $extension = $imageFile->getClientOriginalExtension();

            // Filename to store
            $filename = 'user_profile' . '_' . time() . '.' . $extension;
            Storage::disk('public')->putFileAs($destination_path, $imageFile, $filename);

            // save filename to db
            $addUserProfile = new UserProfile();
            $addUserProfile->user_id = $request->user_id;
            $addUserProfile->image = $filename;
            $addUserProfile->save();

            return response()->json([
                'filename' => $filename,
            ]);
        }
    }
}
