<?php

namespace Joelwmale\LivewireQuill\Traits;

use Livewire\Attributes\On;

trait HasQuillEditor
{
    /**
     * Boot the HasQuillEditor trait for Livewire 3 compatibility.
     *
     * In Livewire 4+, the getListeners() method is no longer supported.
     * Instead, add the #[On('contentChanged')] attribute directly to your
     * contentChanged() method:
     *
     *   #[On('contentChanged')]
     *   public function contentChanged(string $editorId, string $content): void
     *   {
     *       $this->content = $content;
     *   }
     *
     * This trait provides backward compatibility for Livewire 3.x by registering
     * the listener via getListeners(). For Livewire 4+, use the attribute approach.
     */
    public function getListeners()
    {
        $parentListeners = property_exists($this, 'listeners') ? $this->listeners : [];

        return array_merge($parentListeners, [
            'contentChanged',
        ]);
    }

    /**
     * Handle the contentChanged event from the Quill editor.
     * Override this method in your component to handle the content change.
     */
    #[On('contentChanged')]
    public function contentChanged(string $editorId, string $content): void
    {
        // Override this method in your component to handle content changes.
    }
}
