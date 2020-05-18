<?php

namespace Croustille\Image\Models;

interface ImageSourceInterface
{
    public function width();

    public function height();

    public function caption();

    public function alt();

    public function srcSets();

    public function defaultSrc();

    public function sizesAttr();

    public function dataAttr();

    public function lqip();
}
