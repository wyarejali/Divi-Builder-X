import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/Divi-Builder-X-core';

import './styles.css';

class PriceList extends Component {
    static slug = 'dibx_pricelist';

    static css(props) {
        const additionalCss = [];

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dibx_pricelist-item-wrapper',
                optionName: 'layout',
                property: 'display',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-item-wrapper',
                optionName: 'content_position',
                property: 'align-items',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-item-wrapper',
                optionName: 'content_gap',
                property: 'gap',
            },

            {
                selector: '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-icon i.dibx_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-icon',
                optionName: 'icon_margin',
                property: 'margin',
            },

            {
                selector: '%%order_class%% .dibx_pricelist-image-wrapper',
                optionName: 'image_width',
                property: 'width',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-image',
                optionName: 'image_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-image',
                optionName: 'image_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-image-wrapper',
                optionName: 'image_align',
                property: 'justify-content',
            },

            {
                selector: '%%order_class%% .dibx_pricelist-divider',
                optionName: 'divider_color',
                property: 'border-color',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-divider',
                optionName: 'divider_style',
                property: 'border-style',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-divider',
                optionName: 'divider_weight',
                property: 'border-bottom-width',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-heading',
                optionName: 'divider_gap',
                property: 'gap',
            },
            {
                selector: '%%order_class%% .dibx_pricelist-heading',
                optionName: 'divider_position',
                property: 'align-items',
            },

            {
                selector: '%%order_class%% .dibx_pricelist_item',
                optionName: 'item_margin',
                property: 'margin',
                important: true,
            },
            {
                selector: '%%order_class%% .dibx_pricelist_item',
                optionName: 'item_padding',
                property: 'padding',
                important: true,
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    render() {
        return (
            <div className="dibx_pricelist-container">
                <div className="dibx_pricelist-wrapper">
                    {this.props.content}
                </div>
            </div>
        );
    }
}

export default PriceList;
