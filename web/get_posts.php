<?php
  include 'header.php';
/*
  //send the user to reddit to obtain permission to access their saved posts
  if($_SESSION['reddit_state'] === "initial") {
    $_SESSION['reddit_state'] = "attempt_to_authorize";
    header('Location: https://www.reddit.com/api/v1/authorize?client_id=CXR7MyVIXCoN7A&response_type=code&state=suzanne&redirect_uri=https://ancient-wave-30284.herokuapp.com/get_posts.php&duration=temporary&scope=history')
  }
  //handle the response from reddit
  else if($_SESSION['reddit_state'] === "attempt_to_authorize") {
    //did not get permission
    if(isset($_GET['error'])) {
      $_SESSION['reddit_state'] = "initial";
      echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
    }
    //got permission
    else {
      //$_SESSION['reddit_state'] = "authorized";
      //make sure we initiated request by comparing state
      if ($_GET['state'] !== "suzanne") {
        $_SESSION['reddit_state'] = "initial";
        //TODO randomize state each time a request is made
        echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
      }
      //this is if everything went right so far
      else {
        $_SESSION['reddit_state'] = "authorized";
        $_SESSION['reddit_code'] = $_GET['code'];

        //request an access token via a POST request
        $url = "https://www.reddit.com/api/v1/access_token";
        $data = array('grant_type' => 'authorization_code', 'code' => $_GET['code'], 'redirect_uri' => 'https://ancient-wave-30284.herokuapp.com/get_posts.php');

        // use key 'http' even if you send the request to https://...
        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
          )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
          //something went wrong
          $_SESSION['reddit_state'] = "initial";
          echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
        }
        //everything went right
        else {
          //put data into php array
          $result_data = json_decode($result);
          $_SESSION['reddit_token'] = $result_data->access_token;
          $_SESSION['reddit_state'] = "have_token";
        }
        var_dump($result);
      }
    }
  }

  if ($_SESSION['reddit_state'] === "have_token") {
    //TODO hard-coding this for now. need to request it via reddit api
    $_SESSION['reddit_user'] = 'sbrenchley';



    //request the user's saved posts
    $url = "https://oauth.reddit.com/api/v1/user/" . $_SESSION['reddit_user'] . "/saved";
    $data = array('grant_type' => 'authorization_code', 'code' => $_GET['code'], 'redirect_uri' => 'https://ancient-wave-30284.herokuapp.com/get_posts.php');

    // use key 'http' even if you send the request to https://...
    $options = array(
      'http' => array(
        'header'  => ["Content-type: application/json\r\n",
                      "Authorization: bearer " . $_SESSION['reddit_token'] . "\r\n"],
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) {
      //something went wrong
      $_SESSION['reddit_state'] = "initial";
      echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
    }
    //everything went right
    else {
      //put data into php array
      $result_data = json_decode($result);
      $_SESSION['reddit_token'] = $result_data->access_token;
      $_SESSION['reddit_state'] = "have_token";
    }
    var_dump($result);
  }
*/?>


<?php
function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}




$saved_posts_data = '{"kind": "Listing", "data": {"modhash": "2igxrbasxf3fe40b35340d01c6cda8de8ec17848d6438ea54d", "children": [{"kind": "t3", "data": {"contest_mode": false, "subreddit_name_prefixed": "r/latterdaysaints", "banned_by": null, "media_embed": {}, "thumbnail_width": 140, "subreddit": "latterdaysaints", "selftext_html": null, "selftext": "", "likes": null, "suggested_sort": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "686f2r", "view_count": null, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "JohnBernhisel", "saved": true, "mod_reports": [], "name": "t3_686f2r", "score": 6, "approved_by": null, "over_18": false, "domain": "docs.google.com", "hidden": false, "preview": {"images": [{"source": {"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?s=d874697279347f1ffc52e86f6026a058", "width": 1200, "height": 630}, "resolutions": [{"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=108&amp;s=d3b8d6cf92b8c044bd3c1fcbc3b4eb66", "width": 108, "height": 56}, {"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=216&amp;s=5b8c9ac81b7b793fa36506b3330a2e8b", "width": 216, "height": 113}, {"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=320&amp;s=f7f8227fe0ea344cd83f425b105d88fc", "width": 320, "height": 168}, {"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=640&amp;s=53fb501cd0fc57e86def337e7bd2b0b3", "width": 640, "height": 336}, {"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=960&amp;s=32e0fe697ee81c5e6760ba1d6d8685d8", "width": 960, "height": 504}, {"url": "https://i.redditmedia.com/j1UckpjC6DJxrULy7QWdAS4NtYNQ3wf6rDRllF6T1q8.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=1080&amp;s=2f5ac5a7db24c4b74aec0c263a555a65", "width": 1080, "height": 567}], "variants": {}, "id": "R8Ql3uc0nTqv5qvj1T0rXY0nbHprVuBBZiMSHDqE0Vs"}], "enabled": false}, "thumbnail": "https://b.thumbs.redditmedia.com/Md0lSoqbP4YcVbrszzLLW_L5SyjlUNIhOhUAxzrMelg.jpg", "subreddit_id": "t5_2uas2", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "gilded": 0, "downs": 0, "brand_safe": true, "archived": false, "removal_reason": null, "post_hint": "link", "can_gild": true, "thumbnail_height": 73, "hide_score": false, "spoiler": false, "permalink": "/r/latterdaysaints/comments/686f2r/the_most_cited_state_name_in_general_conference/", "num_reports": null, "locked": false, "stickied": false, "created": 1493453425.0, "url": "https://docs.google.com/spreadsheets/d/1-9n27oUHwR3rQCtfjoZh5dQZN_7FpIgl71xl4bRQ1BI/edit#gid=0", "author_flair_text": null, "quarantine": false, "title": "The most cited state name in General Conference history is Utah, followed by Missouri. The least mentioned are Delaware and North Dakota.", "created_utc": 1493424625.0, "distinguished": null, "media": null, "num_comments": 1, "is_self": false, "visited": false, "subreddit_type": "public", "ups": 6}}, {"kind": "t3", "data": {"contest_mode": false, "subreddit_name_prefixed": "r/latterdaysaints", "banned_by": null, "media_embed": {}, "thumbnail_width": 140, "subreddit": "latterdaysaints", "selftext_html": null, "selftext": "", "likes": null, "suggested_sort": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "685gfm", "view_count": null, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "DurtMacGurt", "saved": true, "mod_reports": [], "name": "t3_685gfm", "score": 15, "approved_by": null, "over_18": false, "domain": "speeches.byu.edu", "hidden": false, "preview": {"images": [{"source": {"url": "https://i.redditmedia.com/uWRlGkPthnHV-8c4sn0WF1RvoyVI9lEBHdIG3nE8W5E.jpg?s=07b8580fc0e9b4bb8b631102005f2e1b", "width": 398, "height": 429}, "resolutions": [{"url": "https://i.redditmedia.com/uWRlGkPthnHV-8c4sn0WF1RvoyVI9lEBHdIG3nE8W5E.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=108&amp;s=61a8f33e7442c3c56868560aae5c2fd5", "width": 108, "height": 116}, {"url": "https://i.redditmedia.com/uWRlGkPthnHV-8c4sn0WF1RvoyVI9lEBHdIG3nE8W5E.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=216&amp;s=d35106d0384b4ed232e4677b2a0a7d5d", "width": 216, "height": 232}, {"url": "https://i.redditmedia.com/uWRlGkPthnHV-8c4sn0WF1RvoyVI9lEBHdIG3nE8W5E.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=320&amp;s=8fe002bbd8bb4dac370c19a02ac117cd", "width": 320, "height": 344}], "variants": {}, "id": "jqimBYHKjeyBEigrHmQb0UJ1VEH6P_jSFkVfHkiaHfs"}], "enabled": false}, "thumbnail": "https://a.thumbs.redditmedia.com/Kkb4loIsOMJoPUW6N-3XcptV-3Lyh122Uq9jvOTLMw8.jpg", "subreddit_id": "t5_2uas2", "edited": false, "link_flair_css_class": null, "author_flair_css_class": "rlatterdaysaints", "gilded": 0, "downs": 0, "brand_safe": true, "archived": false, "removal_reason": null, "post_hint": "link", "can_gild": true, "thumbnail_height": 140, "hide_score": false, "spoiler": false, "permalink": "/r/latterdaysaints/comments/685gfm/what_did_josiah_reform_the_earlier_religion_of/", "num_reports": null, "locked": false, "stickied": false, "created": 1493442549.0, "url": "https://speeches.byu.edu/talks/margaret-barker_josiah-reform-earlier-religion-israel/", "author_flair_text": "Alma 34:16", "quarantine": false, "title": "What Did Josiah Reform? The Earlier Religion of Israel - Dr. Margaret Barker", "created_utc": 1493413749.0, "distinguished": null, "media": null, "num_comments": 7, "is_self": false, "visited": false, "subreddit_type": "public", "ups": 15}}, {"kind": "t3", "data": {"contest_mode": false, "subreddit_name_prefixed": "r/latterdaysaints", "banned_by": null, "media_embed": {}, "thumbnail_width": 140, "subreddit": "latterdaysaints", "selftext_html": null, "selftext": "", "likes": null, "suggested_sort": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "68b351", "view_count": null, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "keylimesoda", "saved": true, "mod_reports": [], "name": "t3_68b351", "score": 11, "approved_by": null, "over_18": false, "domain": "lds.org", "hidden": false, "preview": {"images": [{"source": {"url": "https://i.redditmedia.com/QV73GLIGlUOfJzBG2ruNX4NGXDo-GULkC7xpRn1Ahyc.jpg?s=baa375ed7a99b22ec798b74e1346bf5e", "width": 590, "height": 442}, "resolutions": [{"url": "https://i.redditmedia.com/QV73GLIGlUOfJzBG2ruNX4NGXDo-GULkC7xpRn1Ahyc.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=108&amp;s=21f1bb7bc242e4afc9e8e4fa889599f3", "width": 108, "height": 80}, {"url": "https://i.redditmedia.com/QV73GLIGlUOfJzBG2ruNX4NGXDo-GULkC7xpRn1Ahyc.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=216&amp;s=611c5e5ed422b2684f55c826abecb119", "width": 216, "height": 161}, {"url": "https://i.redditmedia.com/QV73GLIGlUOfJzBG2ruNX4NGXDo-GULkC7xpRn1Ahyc.jpg?fit=crop&amp;crop=faces%2Centropy&amp;arh=2&amp;w=320&amp;s=f88f8134ac3077e99015d15f2333e131", "width": 320, "height": 239}], "variants": {}, "id": "L5uxaUSz9XXJKFsF5I23tmFsprACWKxC5qWfbV_EKk4"}], "enabled": false}, "thumbnail": "https://b.thumbs.redditmedia.com/msJ3GtSR4lDoFtM79apCZ6F_bpb-k-T0k2DJOI2TiUY.jpg", "subreddit_id": "t5_2uas2", "edited": false, "link_flair_css_class": null, "author_flair_css_class": "rlatterdaysaints", "gilded": 0, "downs": 0, "brand_safe": true, "archived": false, "removal_reason": null, "post_hint": "link", "can_gild": true, "thumbnail_height": 104, "hide_score": false, "spoiler": false, "permalink": "/r/latterdaysaints/comments/68b351/phenomenal_talk_from_mcconkie_on_this_weeks/", "num_reports": null, "locked": false, "stickied": false, "created": 1493521676.0, "url": "https://www.lds.org/general-conference/1975/04/obedience-consecration-and-sacrifice?lang=eng", "author_flair_text": "Caffeine Free", "quarantine": false, "title": "Phenomenal talk from McConkie on this weeks Gospel Doctrine topic: The Law of Consecration", "created_utc": 1493492876.0, "distinguished": null, "media": null, "num_comments": 2, "is_self": false, "visited": false, "subreddit_type": "public", "ups": 11}}, {"kind": "t3", "data": {"contest_mode": false, "subreddit_name_prefixed": "r/latterdaysaints", "banned_by": null, "media_embed": {}, "thumbnail_width": null, "subreddit": "latterdaysaints", "selftext_html": null, "selftext": "", "likes": null, "suggested_sort": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "689y2x", "view_count": null, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "MachineGunFarts", "saved": true, "mod_reports": [], "name": "t3_689y2x", "score": 12, "approved_by": null, "over_18": false, "domain": "self.latterdaysaints", "hidden": false, "thumbnail": "self", "subreddit_id": "t5_2uas2", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "gilded": 0, "downs": 0, "brand_safe": true, "archived": false, "removal_reason": null, "can_gild": true, "thumbnail_height": null, "hide_score": false, "spoiler": false, "permalink": "/r/latterdaysaints/comments/689y2x/should_i_pay_tithing_on_unemployment/", "num_reports": null, "locked": false, "stickied": false, "created": 1493509121.0, "url": "https://www.reddit.com/r/latterdaysaints/comments/689y2x/should_i_pay_tithing_on_unemployment/", "author_flair_text": null, "quarantine": false, "title": "Should I pay tithing on unemployment?", "created_utc": 1493480321.0, "distinguished": null, "media": null, "num_comments": 70, "is_self": true, "visited": false, "subreddit_type": "public", "ups": 12}}], "after": null, "before": null}}';

//  $saved_posts_data = json_encode($saved_posts_data, JSON_PRETTY_PRINT);

//    var_dump($saved_posts_data);

//echo prettyPrint($saved_posts_data);
echo 'begin';

$example_data = '{
    "type": "donut",
    "name": "Cake",
    "toppings": [
        { "id": "5002", "type": "Glazed" },
        { "id": "5006", "type": "Chocolate with Sprinkles" },
        { "id": "5004", "type": "Maple" }
    ]
}';

$data = json_decode($example_data);
echo $data->type;

echo prettyPrint($saved_posts_data);

echo '<br>';
echo 'wrote out saved posts date';
echo '<br>';
echo $saved_posts_data->data;
echo '<br>';
echo 'wrote out savedpostsdata->data';
echo '<br>';
var_dump($saved_posts_data->data);
echo '<br>';
echo 'var dump saved posts data data';
echo '<br>';
echo $saved_posts_data->data->children[1]->data->subreddit;
echo '<br>';
echo 'wrote out children data subreddit';
echo '<br>';
$json = $json_decode($saved_posts_data);
echo $json->data;
echo $json->data->children[1]->data->subreddit;
echo 'wrote out children data subreddit';
$posts = $json->data->children;
echo $posts[0]->data->subreddit;
echo 'wrote out data subreddit';
foreach ($posts as $post) {
  echo '<p>' . $post->data->title . '<p>';
}

 ?>
