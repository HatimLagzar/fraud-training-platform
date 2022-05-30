<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Core\Country\CountryService;
use Illuminate\Support\Facades\Log;
use Throwable;

class EditPostController extends Controller
{
    private CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function __invoke(Post $post)
    {
        try {
            $countries = $this->countryService->getAll();

            return view('admin.posts.edit')
                ->with('post', $post)
                ->with('countries', $countries);
        } catch (Throwable $e) {
            Log::error('failed to show create post page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
