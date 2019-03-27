//
//  SeventhViewController.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 12/03/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//

import UIKit
import WebKit

class EightViewController: UIViewController {
    
    //connect webview object from interface builder to Swift files
    @IBOutlet var webview: WKWebView!
    
    //flag to control page reload
    //essential for maintaining functionality when uploading content (without this, a reload would happen and interrupt content upload)
    var flag=0;
    
    //main function for controlling tab view UI and content
    override func viewDidLoad() {
        
        super.viewDidLoad()
        
        //load only if flag==0 (ensure no unwanted reload happenns)
        if (flag==0){
            
            //declare webview and add the configuration
            self.webview = WKWebView(frame: view.bounds, configuration: WebViewConfiguration.universalConfig.config)
            //activate auto resizing to ensure landscape orientation responsiveness
            self.webview!.autoresizingMask = UIView.AutoresizingMask(rawValue: UIView.AutoresizingMask.flexibleWidth.rawValue | UIView.AutoresizingMask.flexibleHeight.rawValue)
            //enable back-forward navigation gestures for the webview
            webview.allowsBackForwardNavigationGestures = true
            //push webview to view
            self.view.addSubview(self.webview!)
            
            //set the url to be loaded, create the request and send to webview object to display it
            let url="http://cproject.in.cs.ucy.ac.cy/gym/registration/login.php"
            let request=URLRequest(url: URL(string: url)!)
            self.webview.load(request) }
        
        //on first load, switch flag to value 1 so refresh doesn't occur on certain unwanted scenarios
        if(flag==0){flag=1}
    }
    
}
