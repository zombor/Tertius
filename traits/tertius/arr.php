<?php

namespace Tertius;

trait Arr
{
  protected function _path($path, $array, $delimiter= '.')
  {
    if (is_array($path))
    {
      // The path has already been separated into keys
      $keys = $path;
    }
    else
    {
      if (array_key_exists($path, $array))
      {
        // No need to do extra processing
        return $array[$path];
      }

      // Remove starting delimiters and spaces
      $path = ltrim($path, "{$delimiter} ");

      // Remove ending delimiters, spaces, and wildcards
      $path = rtrim($path, "{$delimiter} *");

      // Split the keys by delimiter
      $keys = explode($delimiter, $path);
    }

    do
      {
        $key = array_shift($keys);

        if (ctype_digit($key))
        {
          // Make the key an integer
          $key = (int) $key;
        }

        if (isset($array[$key]))
        {
          if ($keys)
          {
            if (is_array($array[$key]))
            {
              // Dig down into the next part of the path
              $array = $array[$key];
            }
            else
            {
              // Unable to dig deeper
              break;
            }
          }
          else
          {
            // Found the path requested
            return $array[$key];
          }
        }
        else
        {
          // Unable to dig deeper
          break;
        }
      }
    while ($keys);

    // Unable to find the value requested
    return NULL;
  }

}
