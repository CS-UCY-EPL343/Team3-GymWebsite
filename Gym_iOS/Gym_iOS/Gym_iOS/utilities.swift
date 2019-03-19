//
//  utilities.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 15/03/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//

import Foundation
import WebKit


func clearBrowsingData() {
    HTTPCookieStorage.shared.removeCookies(since: Date.distantPast)
    print("[WebCacheCleaner] All cookies deleted")
    
    WKWebsiteDataStore.default().fetchDataRecords(ofTypes: WKWebsiteDataStore.allWebsiteDataTypes()) { records in
        records.forEach { record in
            WKWebsiteDataStore.default().removeData(ofTypes: record.dataTypes, for: [record], completionHandler: {})
            print("[WebCacheCleaner] Record \(record) deleted")    }   }   }



class GlobalPool{

struct processPool {
    static var pool=WKProcessPool()
    static var webdata=WKWebsiteDataStore.default()
    }
}


func setStatusBarBackgroundColor() {
    
    guard let statusBar = UIApplication.shared.value(forKeyPath: "statusBarWindow.statusBar") as? UIView else { return }
    
    statusBar.backgroundColor = UIColor.black
}
