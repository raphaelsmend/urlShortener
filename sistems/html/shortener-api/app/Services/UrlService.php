<?php

namespace  App\Services;

use App\Repositories\UrlRepository;
use App\Traits\GeneralFuncions;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use App\Transformers\UrlTransformer;

class UrlService
{
    private $repository;
    private $urlGenerator;

    use GeneralFuncions;

    function __construct(
        UrlRepository $repository,
        UrlGenerator $urlGenerator
    ) {
        $this->repository = $repository;
        $this->urlGenerator = $urlGenerator;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function isValidUrlShortened(String $urlShortened)
    {
        $url = $this->repository->getByShortened($urlShortened);

        if(empty($url)){
            return true;
        }

        return false;
    }

    public function store(Array $fields)
    {
        if(! array_key_exists("url_shortened", $fields)) {
            $fields["url_shortened"] = $this->generateValidUrlShortened();
        }

        if(! array_key_exists("date_expiration", $fields)) {
            $fields["date_expiration"] = $this->generateDateExpiration();
        }

        return UrlTransformer::transform($this->repository->create($fields));
    }

    private function generateValidUrlShortened()
    {
        $validUrlShortened = false;

        while (! $validUrlShortened) {
            $urlShortened = $this->urlGenerator->to('/')."/".$this->generateUrlShortened();
            if($this->isValidUrlShortened($urlShortened)){
                return $urlShortened;
            }
        }
    }

    public function redirectShortenedUrl(String $urlShortened){
        $urlComplete = $this->urlGenerator->to('/')."/".$urlShortened;
        $url = $this->repository->getByShortened($urlComplete);
        if(empty($url)){
            return response("not found.", Response::HTTP_NOT_FOUND);
        }

        return redirect()->away($url->url_original);
    }
}
