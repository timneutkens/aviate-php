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

        $this->hostUrl = file_get_contents($this->getProjectRoot() . '/.aviate/host.txt');
        return $this->hostUrl;
    }

    public function getDevServerUrl(String $path): string {
        return $this->getDevHost() . $path;
    }
}
