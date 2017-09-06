<?php
namespace WeProvide\Aviate;

abstract class Aviate {
    protected $hostUrl;

    abstract public function getProjectRoot(): string;

    public function getFiles(): array {
        $types = [
            'css' => [],
            'js' => []
        ];

        return $types;
    }

    public function getDevHost(): String {
        if(isset($this->hostUrl)) {
            return $this->hostUrl;
        }

        $file = $this->getProjectRoot() . '/.aviate/host.txt';

        if(!file_exists($file)) {
            throw new Exception('.aviate/host.txt not found. Please run `npm run dev` in your project root.');
        }

        $this->hostUrl = file_get_contents($file);
        return $this->hostUrl;
    }

    public function getDevServerUrl(String $path): string {
        return $this->getDevHost() . $path;
    }
}
