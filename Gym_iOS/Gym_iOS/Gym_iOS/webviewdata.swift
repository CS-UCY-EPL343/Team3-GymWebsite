//
//  webviewdata.swift
//  Gym_iOS
//
//  Created by Chris Loukaides on 15/03/2019.
//  Copyright © 2019 Chris Loukaides. All rights reserved.
//
import WebKit
import Foundation

extension WKWebViewConfiguration {
    static var shared : WKWebViewConfiguration {
        if _sharedConfiguration == nil {
            _sharedConfiguration = WKWebViewConfiguration()
            _sharedConfiguration.websiteDataStore = WKWebsiteDataStore.default()
            _sharedConfiguration.userContentController = WKUserContentController()
            _sharedConfiguration.preferences.javaScriptEnabled = true
            _sharedConfiguration.preferences.javaScriptCanOpenWindowsAutomatically = false
        }
        return _sharedConfiguration
    }
    private static var _sharedConfiguration : WKWebViewConfiguration!
}
