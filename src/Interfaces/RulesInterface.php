<?php

namespace Interfaces;

interface RulesInterface
{
    public function __construct(UploadedFile $image, $preset, $custom_params = null);
    public function handle();

}