<?php

namespace Core;

// for Page Errors
class Response
{   
    const NOT_FOUND = 404;
    const FORBIDDEN = 403;
}

// TO USE (Example):
// abort(Response::FORBIDDEN); 