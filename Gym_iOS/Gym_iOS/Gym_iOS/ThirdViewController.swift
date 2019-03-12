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
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
       
        let url="http://cproject.in.cs.ucy.ac.cy/gym/shop/programs.php"
        let request=URLRequest(url: URL(string: url)!)
        
        self.webview.load(request)
        
        // Do any additional setup after loading the view, typically from a nib.
    }
    
    
}
