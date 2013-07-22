<?php

/**
 * Simple file-based cache
 *
 * @author  Marco Pivetta <ocramius@gmail.com>
 * @method  void __construct(string $path, int $ttl)
 * @todo    -
 * @uses    -
 */
class FileCache
{
    private $cacheFilePath;
    private $cacheFileExpiration;

    /**
     * @throws  InvalidArgumentException
     */
    public function __construct($cacheFilePath, $cacheFileExpiration)
    {
        $this->cacheFilePath = (string) $cacheFilePath;
        $this->cacheFileExpiration  = (int) $cacheFileExpiration;
    }

    /**
     * @return  bool
     */
    public function isFresh()
    {
        return (file_exists($this->cacheFilePath)
            && ($this->cacheFileExpiration > (time() - filemtime($this->cacheFilePath))));
    }

    /**
     * @return  bool
     */
    public function isExpired()
    {
        return ! $this->isFresh();
    }

    public function write(array $data)
    {
        $tmpCacheFilePath = $this->cacheFilePath . '.lock';

        file_put_contents($tmpCacheFilePath, json_encode($data));
        rename($tmpCacheFilePath, $this->cacheFilePath);
        chmod($tmpCacheFilePath, 0604);
    }

    /**
     * Reads data from the cache (does not check existence, use isFresh() for that)
     *
     * @see     isFresh
     * @return  mixed
     */
    public function read()
    {
        return json_decode(file_get_contents($this->cacheFilePath));
    }
}
