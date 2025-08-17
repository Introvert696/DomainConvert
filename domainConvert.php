<?php

/**
 * @author Introvert696
·▄▄▄▄        • ▌ ▄ ·.  ▄▄▄· ▪   ▐ ▄  ▄▄·        ▐ ▄  ▌ ▐·▄▄▄ .▄▄▄  ▄▄▄▄▄
██▪ ██ ▪     ·██ ▐███▪▐█ ▀█ ██ •█▌▐█▐█ ▌▪▪     •█▌▐█▪█·█▌▀▄.▀·▀▄ █·•██  
▐█· ▐█▌ ▄█▀▄ ▐█ ▌▐▌▐█·▄█▀▀█ ▐█·▐█▐▐▌██ ▄▄ ▄█▀▄ ▐█▐▐▌▐█▐█•▐▀▀▪▄▐▀▀▄  ▐█.▪
██. ██ ▐█▌.▐▌██ ██▌▐█▌▐█ ▪▐▌▐█▌██▐█▌▐███▌▐█▌.▐▌██▐█▌ ███ ▐█▄▄▌▐█•█▌ ▐█▌·
▀▀▀▀▀•  ▀█▄▀▪▀▀  █▪▀▀▀ ▀  ▀ ▀▀▀▀▀ █▪·▀▀▀  ▀█▄▀▪▀▀ █▪. ▀   ▀▀▀ .▀  ▀ ▀▀▀ 

 * Convert You domain list for paste in nekobox
 */

const PRE_STRING_VALUE = 'domain:';
const READ_FILENAME = 'Example.txt';
const RESULT_FILENAME = 'result1.txt';

function getFileContent(string $filePath): array
{
    $fileContent = file($filePath);

    if (!$fileContent) {
        print_r('ERROR - File is not exists');
        exit;
    }

    return $fileContent;
}

function getVerifedDomainList(array $fileContent): string
{
    $currentDomain = [];

    foreach ($fileContent as $line) {
        $currentDomain[] = PRE_STRING_VALUE . $line;
    }

    return implode('', $currentDomain);
}

function saveResultFile(string $domainList, string $filename): void
{
    $resultPut = file_put_contents($filename, $domainList);

    if (!$resultPut) {
        print_r('ERROR, cant save result file, check constant');
        exit;
    }
}

function main(): void
{
    $fileContent = getFileContent(READ_FILENAME);
    $verifedDomainList = getVerifedDomainList($fileContent);
    saveResultFile($verifedDomainList, RESULT_FILENAME);

    print_r('Conversion completed!');
}

main();
