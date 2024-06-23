<?php

if (!function_exists('attributes')) {
    /**
     * Convert components attributes to a string of attributes for HTML elements and Blade components.
     * 
     * @param \Illuminate\View\ComponentAttributeBag $attributes attributes of the component.
     * @param array $onlyInclude attributes to include in the string (if a key and value is present it casts the key to the value).
     * @param array $exclude attributes to exclude from the string.
     * @param string $initialClass initial class to add to the class attribute.
     * @return string
     */
    function attributes(
        \Illuminate\View\ComponentAttributeBag|array $attributes, 
        array|string|null $onlyInclude = [], 
        array|string|null $exclude = [],
        string|array|null $initialClass = ''
    ) {
        if (!is_array($attributes)) {
            $attributes = $attributes->getAttributes();
        }

        $isClassSet = in_array('class', array_keys($attributes));

        $htmlAttributes = '';

        if (!empty($exclude)) {
            foreach ($exclude as $key) {
                unset($attributes[$key]);
            }
        }

        foreach ($attributes as $key => $value) {
            if (
                !empty($onlyInclude) &&
                !in_array($key, array_keys($onlyInclude)) && 
                !in_array($key, array_values($onlyInclude))
            ) {
                continue;
            }

            $keyCopy = trim($key);

            if (!empty($onlyInclude)) {
                foreach ($onlyInclude as $includeKey => $includeValue) {
                    if (is_numeric($includeKey)) {
                        if ($key === $includeValue) {
                            break;
                        }
                    } else {
                        if ($key === $includeKey) {
                            $keyCopy = $includeValue;
                            break;
                        }
                    }
                }
            }

            if (is_bool($value) || empty($value)) {
                if ($value === true || empty($value)) {
                    $htmlAttributes .= trim($value) ? "$keyCopy " : '';
                }
            } else {
                if ($key === 'class' && !empty($initialClass)) {
                    if (is_string($initialClass)) {
                        $value = $initialClass . ' ' . $value;
                    } elseif (is_array($initialClass)) {
                        foreach ($initialClass as $class => $condition) {
                            if (is_int($class) && !empty($condition)) {
                                $value = trim($value) . ' ' . trim($condition);
                            } elseif (!empty($class) && $condition) {
                                $value = trim($value) . ' ' . trim($class);
                            }
                        }
                    }
                }
                
                $htmlAttributes .= $keyCopy . '="' . e($value) . '" ';
            }
        }

        if (!$isClassSet && !empty($initialClass)) {
            $className = '';

            if (is_string($initialClass)) {
                $className = $initialClass;
            } elseif (is_array($initialClass)) {
                foreach ($initialClass as $class => $condition) {
                    if (is_int($class) && !empty($condition)) {
                        $className = trim($className) . ' ' . trim($condition);
                    } elseif (!empty($class) && $condition) {
                        $className = trim($className) . ' ' . trim($class);
                    }
                }
            }

            $htmlAttributes .= 'class="' . $className . '" ';
        }

        $htmlAttributes = trim($htmlAttributes);

        return $htmlAttributes;
    }
}