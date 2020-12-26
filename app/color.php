<?php

namespace DntView\Layout\App;

class Color
{

    protected function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    public function randColor()
    {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }

}
