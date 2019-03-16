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

    
    @IBOutlet var webview: WKWebView!
    
    var flag=0;
    
    override func viewDidLoad() {
    
        super.viewDidLoad()
        
        if (flag==0){
        
            clearBrowsingData();
        
            let configuration = WKWebViewConfiguration()
            configuration.preferences.javaScriptEnabled=true
            configuration.processPool=GlobalPool.processPool.pool
            configuration.websiteDataStore=GlobalPool.processPool.webdata
            
            self.webview = WKWebView(frame: view.bounds, configuration: configuration)
            self.view.addSubview(self.webview!)

            let url="http://cproject.in.cs.ucy.ac.cy/gym/index.php"
            let request=URLRequest(url: URL(string: url)!)
            self.webview.load(request) }
        
        if(flag==0){flag=1}
    }
    
}
