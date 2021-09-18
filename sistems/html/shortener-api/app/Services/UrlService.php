<?php

namespace  App\Services;

use App\Repositories\UrlRepository;
use App\Traits\GeneralFuncions;

class UrlService
{
    private $repository;

    use GeneralFuncions;

    function __construct(
        UrlRepository $repository
    ) {
        $this->repository = $repository;
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

        return $this->repository->create($fields);
    }

    private function generateValidUrlShortened()
    {
        $validUrlShortened = false;

        while (! $validUrlShortened) {
            $urlShortened = $this->generateUrlShortened();
            if($this->isValidUrlShortened($urlShortened)){
                return $urlShortened;
            }
        }
    }
}
