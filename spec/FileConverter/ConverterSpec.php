<?php

namespace spec\FileConverter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('FileConverter\Converter');
    }
}
