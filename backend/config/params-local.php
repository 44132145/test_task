<?php
return [
        'Mask2FormatterStandart' => ['needle' => ['m'], 'replace' => ['M']],
        'currDiffUpdate' => 'UPDATE currency SET currDiff = (currencyUA/((currencyRU/currencyUA)-currencyRU)) where source_date=:date',
];
