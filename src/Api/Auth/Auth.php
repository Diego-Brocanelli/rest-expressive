<?php

namespace Api\Auth;

use Api\Auth\Rules;
use Zend\Stratigility\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Auth implements MiddlewareInterface
{
    /**
     * Check credentials
     *
     * @param  Request  $request
     * @param  Response $response
     * @param  callable   $out
     * @return callable
     */
    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        if(!$request->hasHeader('authorization')){
            return $response->withStatus(401);
        }

        if(!$this->isValid($request)){
            return $response->withStatus(401);
        }

        return $out($request, $response);
    }

    /**
     * Verify token is valid
     *
     * @return boolean [description]
     */
    public function isValid(Request $request)
    {
        $token = $request->getHeader('authorization');
        $rules = new Rules();
        return $rules->isValid($token[0]);
    }
}
