<?php

namespace App\Repositories;

/**
 * Widget Repository
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Repository
 */

use App\Widget;
use App\Contracts\Repositories\WidgetRepositoryContract;

use App\Contracts\Widget\CreateServiceContract as WidgetCreateServiceContract;
use App\Contracts\Widget\LookupServiceContract as WidgetLookupServiceContract;
use App\Contracts\Widget\UpdateServiceContract as WidgetUpdateServiceContract;
use App\Contracts\Widget\DeleteServiceContract as WidgetDeleteServiceContract;

class WidgetRepository implements WidgetRepositoryContract
{

    /**
     * Create Service
     *
     * @var \App\Contracts\Widget\CreateServiceContract
     */
    protected $createService;

    /**
     * Lookup Service
     *
     * @var \App\Contracts\Widget\LookupServiceContract
     */
    protected $lookupService;

    /**
     * Update Service
     *
     * @var \App\Contracts\Widget\UpdateServiceContract
     */
    protected $updateService;

    /**
     * Delete Service
     *
     * @var \App\Contracts\Widget\UpdateServiceContract
     */
    protected $deleteService;

    /**
     * Instantiate widget repository
     *
     * @param  \App\Contracts\Widget\CreateServiceContract  $createService
     * @param  \App\Contracts\Widget\LookupServiceContract  $lookupService
     * @param  \App\Contracts\Widget\UpdateServiceContract  $updateService
     * @param  \App\Contracts\Widget\DeleteServiceContract  $deleteService
     */
    public function __construct(WidgetCreateServiceContract $createService, WidgetLookupServiceContract $lookupService, WidgetUpdateServiceContract $updateService, WidgetDeleteServiceContract $deleteService)
    {
        $this->createService = $createService;
        $this->lookupService = $lookupService;
        $this->updateService = $updateService;
        $this->deleteService = $deleteService;
    }

    /**
     * Create widget
     *
     * @param  array  $attributes
     * @return \App\Widget
     */
    public function createWidget(array $attributes = array())
    {
        return $this->createService->create($attributes);
    }

    /**
     * Get widget by
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return \App\Widget
     */
    public function getWidgetBy($key, $value)
    {
        return $this->lookupService->getBy($key, $value);
    }

    /**
     * Save widget
     *
     * @param  \App\Widget  $widget
     * @return bool
     */
    public function saveWidget(Widget $widget)
    {
        return $this->updateService->save($widget);
    }

    /**
     * Delete widget
     *
     * @param  \App\Widget  $widget
     * @return bool
     */
    public function deleteWidget(Widget $widget)
    {
        return $this->deleteService->delete($widget);
    }
}
