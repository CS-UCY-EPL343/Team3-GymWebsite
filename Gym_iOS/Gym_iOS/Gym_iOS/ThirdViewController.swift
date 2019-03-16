//
//  ThirdViewController.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 12/03/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//

//import Foundation
import UIKit
import WebKit

class ThirdViewController: UIViewController {
    

    @IBOutlet weak var webview: WKWebView!
    
    var flag=0;
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        if (flag==0){
        webview.configuration.preferences.javaScriptEnabled=true
        webview.configuration.websiteDataStore=WKWebsiteDataStore.default()
        
        let url="http://cproject.in.cs.ucy.ac.cy/gym/shop/programs.php"
        let request=URLRequest(url: URL(string: url)!)
        
        self.webview.load(request) }
    
        if(flag==0){flag=1}
    }
    
}
