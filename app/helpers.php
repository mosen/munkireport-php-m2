<?php
use Illuminate\Support\HtmlString;

if (!function_exists('mixp')) {
    /**
     * Get the path to a versioned Mix file.
     * Now with custom port support.
     *
     * @param  string $path
     * @param  string $manifestDirectory
     * @param  int    $port Port that the webpack-dev-server is actually running on.
     * @return \Illuminate\Support\HtmlString
     * @throws Exception
     */
    function mixp($path, $manifestDirectory = '', $port = 8089)
    {
        static $manifest;

        if (! starts_with($path, '/')) {
            $path = "/{$path}";
        }

        if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

        if (file_exists(public_path($manifestDirectory.'/hot'))) {
            return new HtmlString("http://localhost:{$port}{$path}");
        }

        if (! $manifest) {
            if (! file_exists($manifestPath = public_path($manifestDirectory.'/mix-manifest.json'))) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }

        return new HtmlString($manifestDirectory.$manifest[$path]);
    }
}