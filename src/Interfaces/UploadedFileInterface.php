<?php


namespace Interfaces;


interface UploadedFileInterface
{
    public function getClientOriginalName();
    public function getClientOriginalExtension();
}