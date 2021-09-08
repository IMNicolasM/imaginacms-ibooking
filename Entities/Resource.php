<?php

namespace Modules\Ibooking\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;
use Modules\Ibooking\Entities\Service;


class Resource extends CrudModel
{
  use Translatable;

  public $transformer = 'Modules\Ibooking\Transformers\ResourceTransformer';
  public $requestValidation = [
    'create' => 'Modules\Ibooking\Http\Requests\CreateResourceRequest',
    'update' => 'Modules\Ibooking\Http\Requests\UpdateResourceRequest',
  ];
  protected $table = 'ibooking__resources';
  public $translatedAttributes = ['title', 'description', 'slug'];
  protected $casts = ['options' => 'array'];
  protected $fillable = [
    'status',
    'options'
  ];

  public $modelRelations = [
    'services' => 'belongsToMany'
  ];

  /**
   * Relation many to many with services
   * @return mixed
   */
  public function services()
  {
    return $this->belongsToMany(Service::class, 'ibooking__service_resource');
  }
}
