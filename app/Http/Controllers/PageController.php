<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Traits\MetaData;
use App\Http\Controllers\Traits\Footer;
use App\Http\Controllers\Traits\Header;

class PageController extends Controller
{
    use MetaData, Footer, Header;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Page::whereTranslation('title', 'Home', 'en')->first();
        abort_unless($item, 404);

        $footer = $this->getFooter();
        $header = $this->getHeader();
        $this->setMetaData($item);

        return view('site.home', compact('item', 'footer', 'header'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Page $item)
    {
        $footer = $this->getFooter();
        $header = $this->getHeader();
        $this->setMetaData($item);

        return view('site.page', compact('item', 'footer', 'header'));
    }
}
