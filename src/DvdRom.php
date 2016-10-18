<?php

namespace src;

/**
 *
 */
class DvdRom extends Dvd
{
  protected $capacite = '4,7 Go';



    /**
     * Get the value of Capacite
     *
     * @return mixed
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * Set the value of Capacite
     *
     * @param mixed capacite
     *
     * @return self
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }

}







































 ?>
