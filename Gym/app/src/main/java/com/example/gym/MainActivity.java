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

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
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

        if (savedInstanceState == null){
        WebView myWebView = (WebView) findViewById(R.id.webview);


        myWebView.clearCache(true);

        myWebView.getSettings().setJavaScriptEnabled(true);
        myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/index.php");

        myWebView.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                view.loadUrl(request.getUrl().toString());
                return false;
            }
        }); }


    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        WebView myWebView = (WebView) findViewById(R.id.webview);

        if (drawer.isDrawerOpen(GravityCompat.START))
            drawer.closeDrawer(GravityCompat.START);
        else if (myWebView.copyBackForwardList().getCurrentIndex() > 0)
            myWebView.goBack();
        else
            super.onBackPressed();
    }


    @Override
    protected void onSaveInstanceState(Bundle outState )
    {
        WebView myWebView = (WebView) findViewById(R.id.webview);
        super.onSaveInstanceState(outState);
        myWebView.saveState(outState);
    }

    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState)
    {
        WebView myWebView = (WebView) findViewById(R.id.webview);
        super.onRestoreInstanceState(savedInstanceState);
        myWebView.restoreState(savedInstanceState);
    }



    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        //getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
       /* if (id == R.id.action_settings) {
            return true;
        } */

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.home) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/index.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });
        } else if (id == R.id.profile) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/profile/profile.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        } else if (id == R.id.programs) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/programs/programs.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        } else if (id == R.id.services) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/services/services.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        }else if (id == R.id.shop) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/shop/shop.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        } else if (id == R.id.prices) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/prices/prices.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        } else if (id == R.id.announcements) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/announcements/announcement.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        } else if (id == R.id.login) {

            WebView myWebView = (WebView) findViewById(R.id.webview);

            myWebView.getSettings().setJavaScriptEnabled(true);
            myWebView.loadUrl("http://cproject.in.cs.ucy.ac.cy/gym/registration/login.php");
            //myWebView.loadUrl("https://www.google.com");

            myWebView.setWebViewClient(new WebViewClient() {
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                    view.loadUrl(request.getUrl().toString());
                    return false;
                }
            });

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

}
