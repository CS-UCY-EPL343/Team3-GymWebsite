//
//  utilities.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 15/03/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//

import Foundation
import WebKit

//function to clear browsing data on clean start of the app
func clearBrowsingData() {
    //remove cookies
    HTTPCookieStorage.shared.removeCookies(since: Date.distantPast)
    
    //fetch all website data records and remove them
    WKWebsiteDataStore.default().fetchDataRecords(ofTypes: WKWebsiteDataStore.allWebsiteDataTypes()) { records in
        records.forEach { record in
            WKWebsiteDataStore.default().removeData(ofTypes: record.dataTypes, for: [record], completionHandler: {})
    }   }
}

//function to change status bar color
func setStatusBarBackgroundColor() {
    
    //fetch the status bar in a local variable
    guard let statusBar = UIApplication.shared.value(forKeyPath: "statusBarWindow.statusBar") as? UIView else { return }
    //change the status bar color
    statusBar.backgroundColor = UIColor.black
}


//class that holds the struct for WebView configuration properties
class WebViewConfiguration{

//object with required webview configuration elements that will be shared by the different webview objects
struct universalConfig {
    static var pool=WKProcessPool()
    static var webdata=WKWebsiteDataStore.default()
    static var config=WKWebViewConfiguration();
    }
}

//function that has to run once by the main ViewController in order to initialize the universal WebvView configuration elements
func initConfig(){
    //enable javascript content support
    WebViewConfiguration.universalConfig.config.preferences.javaScriptEnabled=true
    //set the process pool
    WebViewConfiguration.universalConfig.config.processPool=WebViewConfiguration.universalConfig.pool
    //set the website data store
    WebViewConfiguration.universalConfig.config.websiteDataStore=WebViewConfiguration.universalConfig.webdata
}
