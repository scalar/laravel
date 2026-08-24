<?php

declare(strict_types=1);

namespace Scalar;

use Illuminate\Support\Facades\File;
use Scalar\Exceptions\MissingOpenApiDocument;

final class Document
{
    protected ?string $title = null;

    protected ?string $slug = null;

    protected ?string $url = null;

    protected ?string $content = null;

    protected ?string $file = null;

    protected bool $default = false;

    public function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function slug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function url(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function content(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function file(string $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function default(bool $default = true): static
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @param  array<array-key, mixed>  $source
     */
    public static function fromArray(array $source): self
    {
        $document = new self;

        $title = $source['title'] ?? null;
        if (is_string($title)) {
            $document->title($title);
        }

        $slug = $source['slug'] ?? null;
        if (is_string($slug)) {
            $document->slug($slug);
        }

        $url = $source['url'] ?? null;
        if (is_string($url)) {
            $document->url($url);
        }

        $content = $source['content'] ?? null;
        if (is_string($content)) {
            $document->content($content);
        }

        $file = $source['file'] ?? null;
        if (is_string($file)) {
            $document->file($file);
        }

        if (($source['default'] ?? false) === true) {
            $document->default();
        }

        return $document;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $source = [];

        if ($this->title !== null) {
            $source['title'] = $this->title;
        }

        if ($this->slug !== null) {
            $source['slug'] = $this->slug;
        }

        $content = $this->resolveContent();

        if ($content !== null) {
            $source['content'] = $content;
        } elseif ($this->url !== null && $this->url !== '') {
            $source['url'] = $this->url;
        } else {
            throw new MissingOpenApiDocument(
                'A Scalar document needs a `url`, `content`, or `file`.'
            );
        }

        if ($this->default) {
            $source['default'] = true;
        }

        return $source;
    }

    protected function resolveContent(): ?string
    {
        if ($this->file !== null && $this->file !== '') {
            if (! is_file($this->file)) {
                throw new MissingOpenApiDocument(
                    "The configured OpenAPI document could not be found at: {$this->file}"
                );
            }

            return File::get($this->file);
        }

        return $this->content !== null && $this->content !== '' ? $this->content : null;
    }
}
