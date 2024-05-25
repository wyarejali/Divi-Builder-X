import React, { Component } from 'react';
import { renderIconStyle } from '../Core/Divi-Builder-X-core';

class PriceListChild extends Component {
    static slug = 'dibx_pricelist_child';

    static css(props) {
        const additionalCss = [];
        const iconStyle = renderIconStyle(
            props,
            'icon',
            '%%order_class%% .dibx_pricelist-icon i.dibx_icon'
        );

        return additionalCss.concat(iconStyle);
    }

    renderIcon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.icon);

        return (
            <div className="dibx_pricelist-icon">
                <i className="dibx_icon">{Icon}</i>
            </div>
        );
    };

    renderImage = () => {
        return (
            <div className="dibx_pricelist-image-wrapper">
                <div className="dibx_pricelist-image">
                    <img
                        src={`${this.props.image}`}
                        alt={`${this.props.image_alt}`}
                    />
                </div>
            </div>
        );
    };

    renderMedia = () => {
        const mediaType = this.props.media_type;

        if (mediaType === 'image') {
            return this.renderImage();
        }

        if (mediaType === 'icon') {
            return this.renderIcon();
        }
    };

    renderMCE = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dibx_pricelist-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dibx_pricelist-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render_title = () => {
        const heading = this.props.title;
        const Title = this.props.title_level ? this.props.title_level : 'h4';

        return <Title className="dibx_pricelist-title">{heading}</Title>;
    };

    render_price = () => {
        const heading = this.props.price;
        const Title = this.props.price_level ? this.props.price_level : 'h4';

        return <Title className="dibx_pricelist-price">{heading}</Title>;
    };

    render() {
        return (
            <div className="dibx_pricelist-item-wrapper">
                {this.renderMedia()}
                <div className="dibx_pricelist-content">
                    <div className={`dibx_pricelist-heading`}>
                        {this.render_title()}
                        <div className="dibx_pricelist-divider"></div>
                        {this.render_price()}
                    </div>

                    {this.renderMCE(this.props.description)}
                </div>
            </div>
        );
    }
}

export default PriceListChild;
