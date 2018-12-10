<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendMessageRequest;



class HomeController extends Controller
{
    protected $pages;
    protected $content;
    protected $jurisprudence;

    public function __construct()
    {
        $this->content  = new \App\Droit\Api\Content(env('APP_SITE'));
        $this->jurisprudence = new \App\Droit\Api\Jurisprudence(env('APP_SITE'));

        $menu = $this->content->menu('main');
        $this->pages = collect($menu->pages)->pluck('id','slug')->all();

        setlocale(LC_ALL, 'fr_FR.UTF-8');
    }

    /**
     * Homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homepage = $this->content->homepage();
        $blocs    = $this->content->menu('home');
        $arrets   = $this->jurisprudence->arrets(['limit' => 5]);
        $pub      = $homepage->blocs;

        return view('frontend.index')->with(['homepage' => $homepage, 'blocs' => $blocs, 'arrets' => $arrets, 'pub' => $pub]);
    }

    /**
     * Authors page
     *
     * @return \Illuminate\Http\Response
     */
    public function auteur()
    {
        $auteurs = $this->jurisprudence->authors();
        $page    = $this->content->page($this->pages['auteur']);
        $pub     = $page->blocs;

        return view('frontend.auteur')->with(['auteurs' => $auteurs,'page' => $page, 'pub' => $pub]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jurisprudence(Request $request)
    {
        $arrets     = $this->jurisprudence->arrets();
        $analyses   = $this->jurisprudence->analyses();
        $years      = $this->jurisprudence->years();

        $page    = $this->content->page($this->pages['jurisprudence']);
        $pub     = $page->blocs;

        list($categories,$parents) = $this->jurisprudence->categories();

        return view('frontend.jurisprudence')->with([
            'arrets'     => $arrets,
            'analyses'   => $analyses,
            'annees'     => $years,
            'categories' => $categories,
            'parents'    => $parents->pluck('title','id')->all(),
            'pub'        => $pub
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function campagne($id = null)
    {
        $archives   = $this->jurisprudence->archives();
        $newsletter = $this->jurisprudence->campagne($id);

        $blocs = isset($newsletter['blocs']) ? $newsletter['blocs'] : collect([]);
        $campagne = isset($newsletter['campagne']) ? $newsletter['campagne'] : null;

        $page    = $this->content->page($this->pages['campagne']);
        $pub     = $page->blocs;

        return view('frontend.campagne')->with(['campagne' => $campagne, 'blocs' => $blocs, 'archives' => $archives, 'pub' => $pub]);
    }

    /**
     * Pages
     *
     * @return \Illuminate\Http\Response
     */
    public function page($id)
    {
        $page = $this->content->page($id);
        $pub  = $page->blocs;

        return view('frontend.page')->with(['page' => $page, 'pub' => $pub]);
    }

    /**
     * Contact form
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $page = $this->content->page($this->pages['contact']);
        $pub  = $page->blocs;

        return view('frontend.contact')->with(['page' => $page, 'pub' => $pub]);
    }


    /**
     * Send contact message
     *
     * @return Response
     */
    public function sendMessage(SendMessageRequest $request)
    {
        $data = $request->only(['email','nom','remarque']);

        \Mail::send('emails.contact', $data , function($message) {
            $message->to('info@rcassurances.ch', 'RC Assurances')->subject('Message depuis le site www.rcassurances.ch');
        });

        return redirect()->back()->with(['status' => 'success', 'message' => '<strong>Merci pour votre message</strong><br/>Nous vous contacterons dès que possible.']);
    }

}
