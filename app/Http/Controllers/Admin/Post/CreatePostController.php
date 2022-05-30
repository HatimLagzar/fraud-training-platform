<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Services\Core\Country\CountryService;
use Illuminate\Support\Facades\Log;
use Throwable;

class CreatePostController extends Controller
{
    private CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function __invoke()
    {
        try {
            $countries = $this->countryService->getAll();

            return view('admin.posts.create')
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
