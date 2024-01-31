<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFormStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentStep = $request->session()->get('current_step');

        switch ($currentStep) {
            case 2:
                $expectedSegment = 'step-two';
                break;
            case 3:
                $expectedSegment = 'step-three';
                break;
            case 4:
                $expectedSegment = 'step-four';
                break;
            case 5:
                $expectedSegment = 'step-five';
                break;
            case 6:
                $expectedSegment = 'step-six';
                break;
            default:
                $expectedSegment = 'step-one';
        }

        if ($request->segment(3) == $expectedSegment) {
            return $next($request);
        }

        return redirect()->route('user.pernikahan.step-one');
    }
}
