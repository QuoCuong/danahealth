import React, { Component } from 'react'
import OwlCarousel from 'react-owl-carousel'

class MedicineImage extends Component {
    componentWillReceiveProps(nextProps) {
        this.forceUpdate()
    }

    render() {
        let images = this.props.images
        let mainImage = []

        if (images.length) {
            mainImage.push(
                <div key={0}><a className="thumbnails"><img data-name="product_image" src={'/' + this.props.images[0].path} alt="" /></a></div>
            )
        }

        return (
            <div className="col-md-6">
                {mainImage}
                <OwlCarousel
                    id="product-thumbnail"
                    items={5}
                    nav={true}
                    navElement='div'
                    key={`${this.props.images.length + Math.random()}`}
                >
                    {
                        this.props.images.map((image, i) => {
                            return (
                                <div key={i} className="item">
                                    <div className="image-additional">
                                        <a className="thumbnail" href={`/${image.path}`} data-fancybox>
                                            <img src={`/${image.path}`} alt="" />
                                        </a>
                                    </div>
                                </div>
                            )
                        })
                    }
                </OwlCarousel>
            </div>
        );
    }
}

MedicineImage.defaultProps = {
    images: []
};

export default MedicineImage
