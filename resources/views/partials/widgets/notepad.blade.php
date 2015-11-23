<div class="grid-stack-item grid-stack-item-notepad"
    data-gs-x="{{ (isset($widget) && is_object($widget) && method_exists($widget, 'getMetaData') && null !== $widget->getMetaData('gs-x')) ? $widget->getMetaData('gs-x') : '0' }}"
    data-gs-y="{{ (isset($widget) && is_object($widget) && method_exists($widget, 'getMetaData') && null !== $widget->getMetaData('gs-y')) ? $widget->getMetaData('gs-y') : '0' }}"
    data-gs-width="{{ (isset($widget) && is_object($widget) && method_exists($widget, 'getMetaData') && null !== $widget->getMetaData('gs-width')) ? $widget->getMetaData('gs-width') : '4' }}"
    data-gs-height="{{ (isset($widget) && is_object($widget) && method_exists($widget, 'getMetaData') && null !== $widget->getMetaData('gs-height')) ? $widget->getMetaData('gs-height') : '4' }}">
    <div class="grid-stack-item-content">
        <!-- Notepad Widget begin -->
        <div class="widget notepad-widget" data-widget-type="notepad" data-widget-uuid="{{ (isset($widget) && is_object($widget) && method_exists($widget, 'getUUID') && null !== $widget->getUUID()) ? $widget->getUUID() : '' }}">
            <header>
                <h2 class="content-editable"
                    data-medium-mode="Medium.inlineMode"
                    data-widget-meta="true"
                    data-widget-meta-key="title"
                    data-widget-meta-value="innerHTML">
                    {!! (isset($widget) && is_object($widget) && method_exists($widget, 'getMetaData') && null !== $widget->getMetaData('title')) ? $widget->getMetaData('title') : 'Notepad - New Note' !!}
                </h2>
            </header>
            <article>
                <div class="content-editable"
                    data-widget-meta="true"
                    data-widget-meta-key="text"
                    data-widget-meta-value="innerHTML">
                    {!! (isset($widget) && is_object($widget) && method_exists($widget, 'getMetaData') && null !== $widget->getMetaData('text')) ? $widget->getMetaData('text') : 'Your notes go here.' !!}
                </div>
            </article>
        </div>
        <!-- Notepad Widget end -->
    </div>
</div>
