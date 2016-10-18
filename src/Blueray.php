<?php

namespace src;


class Blueray extends Movies
{
  protected $mediaType = 'Disque Optique';
  protected $codage = ['MPEG-4', 'H.264', 'VC-1'];
  protected $diametre;
  protected $poids;
  protected $readMeca = '1x à 36Mb/s';
  protected $utilisation = ['Stockage',
                            'Video HD',
                            'Playstaion 3',
                            'Playstaion 4',
                            'Xbox-One'
                          ];







/**
 * ********************** CONSTANTE
 */







/**
 * ********************** CONSTRUCT
 */







 /**
  * ********************** GETTER/SETTER
  */

  /**
   * Get the value of Media Type
   *
   * @return mixed
   */
  public function getMediaType()
  {
      return $this->mediaType;
  }

  /**
   * Set the value of Media Type
   *
   * @param mixed mediaType
   *
   * @return self
   */
  public function setMediaType($mediaType)
  {
      $this->mediaType = $mediaType;

      return $this;
  }

  /**
   * Get the value of Codage
   *
   * @return mixed
   */
  public function getCodage()
  {
      return $this->codage;
  }

  /**
   * Set the value of Codage
   *
   * @param mixed codage
   *
   * @return self
   */
  public function setCodage($codage)
  {
      $this->codage = $codage;

      return $this;
  }

  /**
   * Get the value of Read Meca
   *
   * @return mixed
   */
  public function getReadMeca()
  {
      return $this->readMeca;
  }

  /**
   * Set the value of Read Meca
   *
   * @param mixed readMeca
   *
   * @return self
   */
  public function setReadMeca($readMeca)
  {
      $this->readMeca = $readMeca;

      return $this;
  }

  /**
   * Get the value of Utilisation
   *
   * @return mixed
   */
  public function getUtilisation()
  {
      return $this->utilisation;
  }

  /**
   * Set the value of Utilisation
   *
   * @param mixed utilisation
   *
   * @return self
   */
  public function setUtilisation($utilisation)
  {
      $this->utilisation = $utilisation;

      return $this;
  }





/**
 * ********************** METHODE
 */








/**
 * ********************** STATIC METHODE
 */












}//endClass


 ?>
