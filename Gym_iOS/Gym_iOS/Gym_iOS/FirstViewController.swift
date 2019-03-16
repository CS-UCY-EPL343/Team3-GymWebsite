//
//  FirstViewController.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 19/02/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//


import UIKit
import WebKit

class FirstViewController: UIViewController {

    
    @IBOutlet weak var webview: WKWebView!
    
    var flag=0;
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        if (flag==0){
        clearBrowsingData();
        webview.configuration.preferences.javaScriptEnabled=true
        webview.configuration.websiteDataStore=WKWebsiteDataStore.default()
        
        let url="http://cproject.in.cs.ucy.ac.cy/gym/index.php"
        let request=URLRequest(url: URL(string: url)!)
        
        self.webview.load(request) }
        
        if(flag==0){flag=1}
    }
    
}
