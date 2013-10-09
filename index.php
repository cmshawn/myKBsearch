<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shawn
 * Date: 10/9/13
 * Time: 11:01 AM
 */

$searchResults = "";

if (isset($HTTP_GET_VARS) && !empty($HTTP_GET_VARS))
{
  $wikiQuery = ParseForWiki($HTTP_GET_VARS);
  $diigoQuery = ParseForDiigo($HTTP_GET_VARS);;
  $evernoteQuery = ParseForEvernote($HTTP_GET_VARS);;
  $ddgQuery = ParseForDuckDuckGo($HTTP_GET_VARS);;

  $searchResults = <<<HTML_RESULTS
      <div id="searchresults">
          <hr/>

          <h3>KB Wiki</h3>
          <iframe id="kbwiki" src="http://codemastershawn.com/search?$wikiQuery"></iframe>

          <h3>Diigo</h3>
          <iframe id="dbdiigo" src="http://diigo.com/DodgerWA/?$diigoQuery"></iframe>

          <h3>Evernote</h3>
          <iframe id="kbevernote" src="http://evernote.com/$evernoteQuery"></iframe>

          <h3>Duck Duck Go</h3>
          <iframe id="duckduckgo" src="http://duckduckgo.com/$ddgQuery"></iframe>
      </div>
HTML_RESULTS;
}


print <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Search my knowledge bases</title>
</head>
<body>
    <h2>My KB Search</h2>

    <form method="GET" action="">
        <input id="query" type="text"/>
        <input type="submit" value="Search"/>
    </form>
$searchResults
</body>
</html>
HTML;

// TODO: Add logic to parse query for each search

/**
 * @param $queryVars
 *
 * @return string
 */
function ParseForWiki($queryVars)
{
  return "BADF00D";
}

/**
 * @param $queryVars
 * @return string
 */
function ParseForDiigo($queryVars)
{
  return "BADF00D";
}

/**
 * @param $queryVars
 * @return string
 */
function ParseForEvernote($queryVars)
{
  return "BADF00D";
}

/**
 * @param $queryVars
 * @return string
 */
function ParseForDuckDuckGo($queryVars)
{
  return "BADF00D";
}
