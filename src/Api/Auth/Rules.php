<?php

namespace Api\Auth;

class Rules
{
    /**
     * Verify Token is valid
     *
     * @param  string  $token
     * @return boolean
     */
    public function isValid($token)
    {
        return $this->rules($token);
    }

    /**
     * Rules for validation token
     *
     * @param  string $token
     * @return boolean
     */
    private function rules($token)
    {
        if(mb_strlen($token) < 12){
            return false;
        }

        if($token !== '987654321abc'){
            return false;
        }

        return true;
    }
}
