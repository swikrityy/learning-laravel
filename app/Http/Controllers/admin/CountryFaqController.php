<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use App\Models\CountryFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CountryFaqController extends Controller
{
    public function index(string $id)
    {
        $country = Country::findOrFail($id);
        $faqs = CountryFaq::where('country_id', $id)->paginate(10);

        return view('admin.country.countryfaq.index', compact('faqs', 'country'));
    }

    public function create(string $id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.countryfaq.create', compact('country'));

    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'question' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('countryfaq.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'countryfaq');
                $input[$image] = $imageName;
            }
        }

        $faq = CountryFaq::create($input);

        return redirect()->route('countryfaq.index', $request->country_id)->with('success', 'Faq added successfully.');
    }

    public function edit(CountryFaq $faq)
    {
        return view('admin.country.countryfaq.edit', compact('faq'));

    }


    public function update(Request $request, CountryFaq $faq)
    {
        $input = $request->all();
        $country = $faq->country->id;

        $rules = [
            'question' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('countryfaq.edit', $faq)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($faq->$image != '') {
                    $file = $faq->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'countryfaq');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete' . $image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($faq->$image != '') {
                    $file = $faq->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $faq->update($input);

        return redirect()->route('countryfaq.index', $country)->with('success', 'Faq Updated successfully.');
    }

    public function destroy(CountryFaq $faq)
    {
        $imagelist = ['image'];
        $country = $faq->country->id;


        foreach ($imagelist as $image) {
            if ($faq->$image != '') {
                $file = $faq->$image;
                removeFile($file);
            }
        }

        $faq->delete();

        return redirect()->route('countryfaq.index', $country)->with('success', 'Faq Deleted successfully.');
    }


}
