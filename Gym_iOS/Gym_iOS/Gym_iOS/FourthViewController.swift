//
//  FourthViewController.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 12/03/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//

//import Foundation
import UIKit
import WebKit

class FourthViewController: UIViewController {
    
    
    @IBOutlet weak var webview: WKWebView!
    
    override func viewDidLoad() {
        super.viewDidLoad()
    
        webview.configuration.preferences.javaScriptEnabled=true
        webview.configuration.websiteDataStore=WKWebsiteDataStore.default()
        
        let url="http://cproject.in.cs.ucy.ac.cy/gym/services/services.php"
        let request=URLRequest(url: URL(string: url)!)
        
        self.webview.load(request)
        
    }
    
}
