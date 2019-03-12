//
//  SecondViewController.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 19/02/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//

import UIKit
import WebKit

class SecondViewController: UIViewController {

  
    @IBOutlet weak var webview: WKWebView!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        
        let url="http://cproject.in.cs.ucy.ac.cy/gym/shop/profile.php"
        let request=URLRequest(url: URL(string: url)!)
        
        self.webview.load(request)
        
        // Do any additional setup after loading the view, typically from a nib.
    }


}

