package com.example.gym;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebResourceError;
import android.webkit.WebResourceRequest;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import android.annotation.TargetApi;

/**
 * The main activity Java file for the application. It is responsible for all the functions of the applications, except the User Interface Design
 */
public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {


    /**
     *
     * @param savedInstanceState proprietary object that allows for the app state to be restored after the app is removed from memory
     */
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //load navigation bar UI element
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        //if no saved instance is found, the app elements are loaded
        if (savedInstanceState == null){

        //create webview object
        WebView myWebView = (WebView) findViewById(R.id.webview);

        //each time the application starts (after exiting from RAM Memory) clear the cache to ensure latest version of content is displayed
        myWebView.clearCache(true);

        //enable javascript (which is required for some content elements)
        myWebView.getSettings().setJavaScriptEnabled(true);

        //load home tab URL
        myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/index.php");

        //after webview configuration is over, display the webview object using WebViewClient
        myWebView.setWebViewClient(new WebViewClient() {
            /**
             * Function responsible for controlling the loading of a URL inside a webview object
             * @param myWebView the webview object
             * @param request the URL loading request
             * @return false if webview display has failed
             */
            @Override
            public boolean shouldOverrideUrlLoading(WebView myWebView, WebResourceRequest request) {
                myWebView.loadUrl(request.getUrl().toString());
                return false;
            }
        });

        }
    }

    /**
     * Function responsible for handling press of the back button
     */
    @Override
    public void onBackPressed() {

        //fetch UI and webview copies so that the event can be handled
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        WebView myWebView = (WebView) findViewById(R.id.webview);

        //if back button is pressed when navigation drawer is open, close the drawer
        if (drawer.isDrawerOpen(GravityCompat.START))
            drawer.closeDrawer(GravityCompat.START);
        //if in webview the user followed a link, go back to the previous link
        else if (myWebView.copyBackForwardList().getCurrentIndex() > 0)
            myWebView.goBack();
        //call superclass implementation for all other actions
        else
            super.onBackPressed();
    }


    /**
     *This function is responsible for creating an object with the state of the webview object so that it can be restored if required
     * @param outState an object which contains a set of saved  data required for state saving and restoring
     */
    @Override
    protected void onSaveInstanceState(Bundle outState )
    {
        WebView myWebView = (WebView) findViewById(R.id.webview);
        super.onSaveInstanceState(outState);
        myWebView.saveState(outState);
    }

    /**
     * This function is responsible for restoring the state of the webview object if required
     * @param savedInstanceState an object which contains a set of saved  data required for state saving and restoring
     */
    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState)
    {
        WebView myWebView = (WebView) findViewById(R.id.webview);
        super.onRestoreInstanceState(savedInstanceState);
        myWebView.restoreState(savedInstanceState);
    }


    /**
     * This function handles user taps on navigation bar elements and loads the correct content when each tap is registered
     * @param item the menu item that is selected
     * @return true if action was succesfully completed, otherwise false
     */
    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        //when home button is pressed
        if (id == R.id.home) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/index.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });
          //when profile button is pressed
        } else if (id == R.id.profile) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/profile/profile.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });
          //when programs button is pressed
        } else if (id == R.id.programs) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/programs/program.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });
          //when services button is pressed
        } else if (id == R.id.services) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/services/services.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

         //when shop button is pressed
        }else if (id == R.id.shop) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/shop/shop.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });
          //when prices button is pressed
        } else if (id == R.id.prices) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/prices/prices.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

          //when announcements button is pressed
        } else if (id == R.id.announcements) {

            //fetch webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/announcements/announcement.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

          //when login button is pressed
        } else if (id == R.id.login) {

            //fetch the webview object
            WebView myWebView = (WebView) findViewById(R.id.webview);

            //the commands below reload the webview with the content of the button pressed
            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/registration/login.php");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });
        }

        //fetch the navigation bar drawer object and close the drawer after correct content is loaded
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

}